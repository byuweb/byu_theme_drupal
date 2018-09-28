pipeline {
  agent any
  stages {
    stage('Pull') {
      steps {
        sh 'git pull origin 7.x-2.x'
      }
    }
    stage('Push') {
      steps {
        sh 'git push git@github.com:blakemorgan/drupal-mirror-test.git HEAD:7.x-2.x'
      }
    }
  }
}
