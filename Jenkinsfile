pipeline { 
    environment { 
        registry_front = "mohammedaminetrabzi/front-end-php"
	registry_db= "mohammedaminetrabzi/back-end-mysql"
        registryCredential = "mohammedaminetrabzi-dockerhub"
	tag="latest"
    }
    agent any 

    stages { 
        stage('Build Application Containers') { 
            steps { 
                script { 
                    sh " docker-compose up -d "
	            sh " docker tag  mysql/mysql-server:5.7 $registry_db:$tag "
                    sh " docker tag  ubuntu:16.04 $registry_front:$tag "
                }
            } 
        }
        stage('Push images to Docker-hub') { 
            steps { 
		withCredentials([usernamePassword(credentialsId: registryCredential , usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]){
		sh " docker login -u $USERNAME -p $PASSWORD "
		sh " docker push $registry_front:$tag " 
	        sh " docker push $registry_db:$tag "
            }
          }
	} 
        stage('Cleaning up') { 
            steps { 
                sh "docker rmi $registry_db:$tag "
		sh "docker rmi $registry_front:$tag"
            }
        } 
    }
}
