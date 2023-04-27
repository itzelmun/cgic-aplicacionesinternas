pipeline {
	environment{
		dockerImageName1 = "devopsucol/cgic-aplicaciones:cgic"
		dockerImageName2 = "devopsucol/phpmyadmin:cgic"
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
				dir('db'){
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

				dir('db') {
		 			script {
						docker.withRegistry('https://registry.hub.docker.com', registryCredential) {
							dockerImage2.push("cgic")
			 			}
					}
				}
	    	}
      	}
	  
		stage('Correr POD') {
		 	steps{
		   		sshagent(['rodriguezssh']) {
			 		sh 'cd yamls && scp -r -o StrictHostKeyChecking=no deploymentcgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deploymentcgic.yaml --kubeconfig=/home/digesetuser/.kube/config'
		
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment cgic-aplicacion -n cgic-aplicaciones --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error)
       					{}
					}
				}
                
				sshagent(['rodriguezssh']) {
			 		sh 'cd yamls && scp -r -o StrictHostKeyChecking=no deployment-cgic-mysql.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
							//sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f secret-cgic.yaml --kubeconfig=/home/digesetuser/.kube/config'
							//sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f cgic-volumen.yaml --kubeconfig=/home/digesetuser/.kube/config'
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deployment-cgic-mysql.yaml --kubeconfig=/home/digesetuser/.kube/config'
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment cgic-aplicacion-mysql -n cgic-aplicaciones --kubeconfig=/home/digesetuser/.kube/config' 

           					//sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment formasvaloradas -n ds-formasvaloradas --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error)
       					{}
					}
				}
				sshagent(['rodriguezssh']) {
			 		sh 'cd yamls && scp -r -o StrictHostKeyChecking=no deployment-phpmyadmin-cgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deployment-phpmyadmin-cgic.yaml --kubeconfig=/home/digesetuser/.kube/config'
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment phpmyadmin-cgic -n cgic-aplicaciones --kubeconfig=/home/digesetuser/.kube/config'
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