pipeline {

    environment {
        dockerimagename1 ="devopsucol/cgic-aplicaciones:v1"
        dockerimagename2 = "devopsucol/phpmyadmin:cgic-aplicaciones"
        dockerImage1 = ""
        dockerImage2= ""
        SONAR_SCANNER_HOME = "/opt/sonar-scanner"
        PATH = "${env.SONAR_SCANNER_HOME}/bin:${env.PATH}"
    }

    agent any
 
    stages {

        stage('Checkout Code') {
            steps {
                git credentialsId: 'devops-github', url: 'https://github.com/sistemas-ucol-mx/cgic_aplicacionesinternas.git', branch:'main'
            }
        }
 
        stage('Static Code Analysis') {
            steps {
                withSonarQubeEnv('sonarqube') {
                    sh "${env.SONAR_SCANNER_HOME}/bin/sonar-scanner \
                        -Dsonar.projectKey=cgic-aplicaciones \
                        -Dsonar.projectName=cgic-aplicacionesourcecode \
                        -Dsonar.projectVersion=1.0 \
                        -Dsonar.sources=yamlsourcecode \
                        -Dsonar.language=php \
                        -Dsonar.login=${sonarqubeGlobal} \
                        -Dsonar.host.url=http://scanner.ucol.mx:9000 \
                        -Dsonar.report.export.path=sonar-report.json"
                }
            }
        }   
  
        stage('Build image APP') {
            steps{
                dir('yamlsourcecode') {
                    script {
                        dockerImage1 = docker.build dockerimagename1
                    }
                }
            }
        }

        stage('Pushing Image APP') {
            environment {
                    registryCredential = 'devopsucol-dockerhub'
                }
            steps{
                dir('yamlsourcecode'){
                    script {
                        docker.withRegistry( 'https://registry.hub.docker.com', registryCredential ) {
                            dockerImage1.push("v1")
                        }
                    }
                }
            }
        }


        stage('Build image phpmyadmin') {
            steps{
                dir('yamlphpmyadmin'){
                    script {
                    dockerImage2 = docker.build dockerimagename2 
                    }
                }
            }
        }

        stage('Pushing Image MYADMIN') {
            environment {
                registryCredential = 'devopsucol-dockerhub'
            }
            steps{
                dir('yamlphpmyadmin'){
                    script {
                        docker.withRegistry( 'https://registry.hub.docker.com', registryCredential ) {
                            dockerImage2.push("cgic-aplicaciones")
                        }
                    }
                }
            }
        }

        stage('Run namespace app'){
            steps{
                sshagent(['sshsanchez']){
                    sh 'cd yamlsourcecode && scp -r -o StrictHostKeyChecking=no namespacecodecgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f namespacecodecgic.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicacionesourcecode -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }
            }
        }

        stage('Run deployment app'){
            steps{
                sshagent(['sshsanchez']){
                    sh 'cd yamlsourcecode && scp -r -o StrictHostKeyChecking=no deploymentcodecgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deploymentcodecgic.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicacionesourcecode -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }
            }
        }

        stage('Run service app'){
            steps{
                sshagent(['sshsanchez']){
                    sh 'cd yamlsourcecode && scp -r -o StrictHostKeyChecking=no servicecodecgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f servicecodecgic.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicacionesourcecode -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }
            }
        }

        stage('Run namespace mysql'){
            steps{
                sshagent(['sshsanchez']){
                    sh 'cd yamlmysql && scp -r -o StrictHostKeyChecking=no namespacecgicmysql.yaml  digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f namespacecgicmysql.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicaciones-deploy --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }
            }
        }

        stage('Run secret mysql'){
            steps{
                sshagent(['sshsanchez']){
                    sh 'cd yamlmysql && scp -r -o StrictHostKeyChecking=no secretcgicmysql.yaml  digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f secretcgicmysql.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicaciones-deploy --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }
            }
        }

        stage('Run volume mysql'){
            steps{
                sshagent(['sshsanchez']){
                sh 'cd yamlmysql && scp -r -o StrictHostKeyChecking=no volumencgicmysql.yaml  digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f volumencgicmysql.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicaciones-deploy --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }
            }
        }

        stage('Run deployment mysql'){
            steps{
                sshagent(['sshsanchez']){
                sh 'cd yamlmysql && scp -r -o StrictHostKeyChecking=no deploymentcgicmysql.yaml  digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deploymentcgicmysql.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicaciones-deploy --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }
            }
        }

        stage('Run service mysql'){
            steps{
                sshagent(['sshsanchez']){
                sh 'cd yamlmysql && scp -r -o StrictHostKeyChecking=no servicecgicmysql.yaml  digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f servicecgicmysql.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicaciones-deploy --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }
            }
        }


        stage('Run namespace phpmyadmin'){
            steps{
                sshagent(['sshsanchez']){
                sh 'cd yamlphpmyadmin && scp -r -o StrictHostKeyChecking=no namespacecgicadmin.yaml digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f namespacecgicadmin.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicaciones-admin -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }
            }
        }
    

        stage('Run deployment phpmyadmin'){
            steps{
                sshagent(['sshsanchez']){
                sh 'cd yamlphpmyadmin && scp -r -o StrictHostKeyChecking=no deploymentcgicadmin.yaml digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deploymentcgicadmin.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicaciones-admin -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }
            }
        }
    

        stage('Run service phpmyadmin'){
            steps{
                sshagent(['sshsanchez']){
                sh 'cd yamlphpmyadmin && scp -r -o StrictHostKeyChecking=no servicecgicadmin.yaml digesetuser@148.213.1.131:/home/digesetuser/'
                    script{
                        try{
                            sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f servicecgicadmin.yaml -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                            //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-aplicaciones-admin -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
                        }catch(error){}
                    }
                }

            }
        }
    }


    post{
        success{
        slackSend channel: 'cgic_aplicacionesinternas', color: 'good', failOnError: true, message: "${custom_msg()}", teamDomain: 'universidadde-bea3869', tokenCredentialId: 'slackpass'}
        }
    }
   


  def custom_msg()
  {
  def JENKINS_URL= "jarvis.ucol.mx:8080"
  def JOB_NAME = env.JOB_NAME
  def BUILD_ID= env.BUILD_ID
  def JENKINS_LOG= " DEPLOY LOG: Job [${env.JOB_NAME}] Logs path: ${JENKINS_URL}/job/${JOB_NAME}/${BUILD_ID}/consoleText"
  return JENKINS_LOG
  }