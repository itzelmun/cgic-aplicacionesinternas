pipeline {
	environment{
		dockerImageName1 = "devopsucol/cgic-aplicaciones:cgic"
		dockerImageName2 = "devopsucol/cgic-aplicaciones:cgicdb"
		dockerImage1 = ""
		dockerImage2 = ""
		SONAR_SCANNER_HOME = "/opt/sonar-scanner"
    	PATH = "${env.SONAR_SCANNER_HOME}/bin:${env.PATH}"

	}

 	agent any

	stages {
		stage('Chechout Source'){
	  		  steps {
                git credentialsId: 'devops-github' , url: 'https://github.com/sistemas-ucol-mx/cgic_aplicacionesinternas.git', branch: 'main'
            }
	 	}

		stage('Static Code Analysis') {
      		steps {
        		withSonarQubeEnv('sonarqube') {
         		sh "${env.SONAR_SCANNER_HOME}/bin/sonar-scanner \
					-Dsonar.projectKey=cgic-aplicacion \
					-Dsonar.projectName=cgic-aplicacion \
					-Dsonar.projectVersion=1.0 \
					-Dsonar.sources=sourcecode \
					-Dsonar.language=php \
					-Dsonar.login=${sonarqubeGlobal} \
					-Dsonar.host.url=http://scanner.ucol.mx:9000 \
					-Dsonar.report.export.path=sonar-report.json"
        		}
      		}
   		}

		stage('Build Image') {
	  		steps{
	   			dir('sourcecode'){
	    			script {
	     				dockerImage1 = docker.build dockerImageName1
	    			}
	   			}
				dir('db/phpmyadmin'){
	    			script {
	     				dockerImage2 = docker.build dockerImageName2
	    			}
	   			}
	  		}
	 	} 

	 	stage('Subir Imagen') {
	  		environment {
	   			registryCredential = 'devopsucol-dockerhub'
	   		}
	  		steps {
				dir('sourcecode') {
		 			script {
						docker.withRegistry('https://registry.hub.docker.com', registryCredential) {
							dockerImage1.push("cgic")
			 			}
					}
				}
				dir('db/phpmyadmin') {
		 			script {
						docker.withRegistry('https://registry.hub.docker.com', registryCredential) {
							dockerImage2.push("cgicdb")
			 			}
					}
				}
	    	}
      	}
	  
		stage('Correr POD proyecto') {
		 	steps{
		   		sshagent(['sshsanchez']) {
			 		sh 'cd sourcecode/yamls && scp -r -o StrictHostKeyChecking=no cgic-namespace-source.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
							sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-namespace-source.yaml --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error)
       					{}
					}
				}
                
				sshagent(['sshsanchez']) {
					sh 'cd sourcecode/yamls && scp -r -o StrictHostKeyChecking=no cgic-deployment-source.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
							sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-deployment-source.yaml --kubeconfig=/home/digesetuser/.kube/config'
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment cgic-aplicacion -n cgic-aplicaciones --kubeconfig=/home/digesetuser/.kube/config' 
          				}catch(error)
       					{}
					}
				}
				sshagent(['sshsanchez']) {
					sh 'cd sourcecode/yamls && scp -r -o StrictHostKeyChecking=no cgic-service-source.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
							sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-service-source.yaml --kubeconfig=/home/digesetuser/.kube/config'
           				
          				}catch(error)
       					{}
					}
				}
			 } 		
		}

		stage('Correr POD MySQL') {
		 	steps{
		   		sshagent(['sshsanchez']) {
			 		sh 'cd db/mysql && scp -r -o StrictHostKeyChecking=no cgic-namespace-mysql.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-namespace-mysql.yaml --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error)
       					{}
					}
				}
				sshagent(['sshsanchez']) {
			 		sh 'cd db/mysql && scp -r -o StrictHostKeyChecking=no cgic-volumen-mysql.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-volumen-mysql.yaml --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error)
       					{}
					}
				}
				sshagent(['sshsanchez']) {
			 		sh 'cd db/mysql && scp -r -o StrictHostKeyChecking=no cgic-secret-mysql.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-secret-mysql.yaml --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error)
       					{}
					}
				}
				sshagent(['sshsanchez']) {
			 		sh 'cd db/mysql && scp -r -o StrictHostKeyChecking=no cgic-deployment-mysql.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-deployment-mysql.yaml --kubeconfig=/home/digesetuser/.kube/config'
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment cgic-mysql -n cgic-aplicaciones --kubeconfig=/home/digesetuser/.kube/config' 
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment cgic-mysql -n cgic-aplicaciones --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error)
       					{}
					}
				}
				sshagent(['sshsanchez']) {
			 		sh 'cd db/mysql && scp -r -o StrictHostKeyChecking=no cgic-service-mysql.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-service-mysql.yaml --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error)
       					{}
					}
				}
		
			}		
		}

		stage('Correr POD phpmyadmin') {
		 	steps{
				sshagent(['sshsanchez']) {
			 		sh 'cd db/phpmyadmin && scp -r -o StrictHostKeyChecking=no cgic-namespace-admin.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-namespace-admin.yaml --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error)
       					{}
					}
				}
		   		sshagent(['sshsanchez']) {
			 		sh 'cd db/phpmyadmin && scp -r -o StrictHostKeyChecking=no cgic-deployment-admin.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-deployment-admin.yaml --kubeconfig=/home/digesetuser/.kube/config'
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment cgic-phpmyadmin -n cgic-aplicaciones --kubeconfig=/home/digesetuser/.kube/config' 
          				}catch(error)
       					{}
					}
				}
				sshagent(['sshsanchez']) {
			 		sh 'cd db/phpmyadmin && scp -r -o StrictHostKeyChecking=no cgic-service-admin.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-service-admin.yaml --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error)
       					{}
					}
				}
			}		
		}

	}

 	post{
         success{
             slackSend channel: 'cgic_aplicacionesinternas', color: 'good', failOnError: true, message: "${custom_msg()}", teamDomain: 'universidadde-bea3869', tokenCredentialId: 'slackpass' 
 		}
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