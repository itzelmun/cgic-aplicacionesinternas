pipeline {

  environment {
    dockerapp = "devopsucol/cgic-aplicaciones"
    //dockeradmin = "udecdj2022/phpmyadmin"
    dockerimageapp = ""
    //dockerimagemyadmin = ""
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
                -Dsonar.projectName=cgic-aplicaciones \
                -Dsonar.projectVersion=1.0 \
                -Dsonar.sources=yamls \
                -Dsonar.language=php \
                -Dsonar.login=${sonarqubeGlobal} \
                -Dsonar.host.url=http://scanner.ucol.mx:9000 \
                -Dsonar.report.export.path=sonar-report.json"
        }
      }
    }   
  

    stage('Build image APP') {
      steps{
        dir('sourcecode'){
        script {
          dockerimageapp = docker.build dockerapp
        }
      }
    }
  }

    stage('Pushing Image APP') {
      environment {
               registryCredential = 'devopsucol-dockerhub'
           }
      steps{
        dir('sourcecode'){
        script {
          docker.withRegistry( 'https://registry.hub.docker.com', registryCredential ) {
            dockerimageapp.push("cgic")
          }
        }
      }
    }
  }

/*
       stage('Build image MYADMIN') {
      steps{
        dir('phpmyadmin'){
        script {
          dockerimagemyadmin = docker.build dockeradmin
        }
      }
    }
  }

    stage('Pushing Image MYADMIN') {
      environment {
               registryCredential = 'dockerhubhaep'
           }
      steps{
        dir('phpmyadmin'){
        script {
          docker.withRegistry( 'https://registry.hub.docker.com', registryCredential ) {
            dockerimagemyadmin.push("vpipeline")
          }
        }
      }
    }
  }
*/
   stage('APLICANDO DEPLOYMENTS APP'){
   steps{
    sshagent(['sshsanchez'])
    {
     sh 'cd yamls && scp -r -o StrictHostKeyChecking=no namespacecodecgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      script{
        try{
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f  namespacecodecgic.yaml --kubeconfig=/home/digesetuser/.kube/config'
           //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment app -n haep --kubeconfig=/home/digesetuser/.kube/config'
//           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment app -n haep --kubeconfig=/home/digesetuser/.kube/config'
          }catch(error)
       {}
     }
    }
  }

    steps{
    sshagent(['sshsanchez'])
    {
     sh 'cd yamls && scp -r -o StrictHostKeyChecking=no deploymentcodecgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      script{
        try{
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f  deploymentcodecgic.yaml --kubeconfig=/home/digesetuser/.kube/config'
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment cgic-aplicaciones -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config'
//           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment app -n haep --kubeconfig=/home/digesetuser/.kube/config'
          }catch(error)
       {}
     }
    }
  }

    steps{
    sshagent(['sshsanchez'])
    {
     sh 'cd yamls && scp -r -o StrictHostKeyChecking=no servicecodecgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      script{
        try{
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f  servicecodecgic.yaml --kubeconfig=/home/digesetuser/.kube/config'
           //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment app -n haep --kubeconfig=/home/digesetuser/.kube/config'
//           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment app -n haep --kubeconfig=/home/digesetuser/.kube/config'
          }catch(error)
       {}
     }
    }
  }

 }
/*
     stage('APLICANDO DEPLOYMENTS MYSQL'){
   steps{
    sshagent(['sshsanchez'])
    {
     sh 'cd mysql && scp -r -o StrictHostKeyChecking=no deployment-mysql-haep8.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      script{
        try{
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f  deployment-mysql-haep8.yaml --kubeconfig=/home/digesetuser/.kube/config'
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment mysql-deployment -n haep --kubeconfig=/home/digesetuser/.kube/config'
//           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment mysql-deployment -n haep --kubeconfig=/home/digesetuser/.kube/config'
          }catch(error)
       {}
     }
    }
  }
 }
*/

    /*     
   stage('APLICANDO DEPLOYMENTS MYADMIN'){
   steps{
    sshagent(['sshsanchez'])
    {
     sh 'cd phpmyadmin && scp -r -o StrictHostKeyChecking=no deployment-phpmyadmin8.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      script{
        try{
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f  deployment-phpmyadmin8.yaml --kubeconfig=/home/digesetuser/.kube/config'
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment phpmyadmin-deployment -n haep --kubeconfig=/home/digesetuser/.kube/config'
//           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment phpmyadmin-deployment -n haep --kubeconfig=/home/digesetuser/.kube/config'
          }catch(error)
       {}
     }
    }
  }
 }
*/
}


  post{
            success{
            slackSend channel: 'cgic_aplicacionesinternas', color: 'good', failOnError: true, message: "${custom_msg()}", teamDomain: 'universidadde-bea3869', tokenCredentialId: 'slackpass' }
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