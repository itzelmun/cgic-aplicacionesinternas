pipeline {
	environment{
		dockerimageapp ="devopsucol/cgic-aplicaciones:cgic"
		 dockerapp = ""
		SONAR_SCANNER_HOME = "/opt/sonar-scanner"
    	PATH = "${env.SONAR_SCANNER_HOME}/bin:${env.PATH}"
	}

 	agent any

	stages {
		stage('Chechout Source'){
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

		stage('Build Image') {
	  		steps{
	   			dir('sourcecode'){
	    			script {
	     				dockerapp = docker.build dockerimageapp
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
							dockerapp.push("cgic")
			 			}
					}
				}
	    	}
      	}
	  
		stage('Correr POD') {
		 	steps{
		   		sshagent(['sshsanchez']){
			 		sh 'cd yamls && scp -r -o StrictHostKeyChecking=no namespacecgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f namespacecgic.yaml --kubeconfig=/home/digesetuser/.kube/config'
           					//sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status namespace ds-formasvaloradas -n ds-formasvaloradas --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error){}
					}
				}
				sshagent(['sshsanchez']){
			 		sh 'cd yamls && scp -r -o StrictHostKeyChecking=no deploymentcgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deploymentcgic.yaml --kubeconfig=/home/digesetuser/.kube/config'
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment cgic-aplicacionesdeploy -n cgic-aplicacionesinternas --kubeconfig=/home/digesetuser/.kube/config' 
           					//sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment formasvaloradas -n ds-formasvaloradas --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error){}
					}
				}
				sshagent(['sshsanchez']){
			 		sh 'cd yamls && scp -r -o StrictHostKeyChecking=no servicecgic.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      				script{
       	 				try{
           					sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f servicecgic.yaml --kubeconfig=/home/digesetuser/.kube/config'
           					//sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status service formasvaloradas -n ds-formasvaloradas --kubeconfig=/home/digesetuser/.kube/config'
          				}catch(error){}
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
