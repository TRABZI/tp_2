pipeline { 
    environment { 
        registry_front = "mohammedaminetrabzi/front-end-php"
	registry_db= "mohammedaminetrabzi/back-end-mysql"
        registryCredential = 'mohammedaminetrabzi-dockerhub'  
    }

    agent any 
    stages { 
        stage('Build Application Containers') { 
            steps { 
                script { 
                    sh " docker-compose up -d "
                }
            } 
        }
        stage('Push images to Docker-hub') { 
            steps { 
		withCredentials([usernamePassword(credentialsId: registryCredential , usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]){
		sh " docker login -u $USERNAME -p $PASSWORD "
		sh " docker rename  mysql/mysql-server $registry_db "
		sh " docker push $registry_front " 
	        sh " docker push $registry_db "
            }
          }
	} 
        stage('Cleaning up') { 
            steps { 
                sh "docker rmi $registry:$BUILD_NUMBER" 
            }
        } 
    }
}
