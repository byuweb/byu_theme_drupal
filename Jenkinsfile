pipeline {
  agent any
  stages {
    stage('Pull') {
      steps {
        sh 'git pull origin 8.x-3.x'
      }
    }
    stage('Push') {
      steps {
        sh 'git push git@github.com:blakemorgan/drupal-mirror-test.git HEAD:8.x-3.x'
      }
    }
  }
}
