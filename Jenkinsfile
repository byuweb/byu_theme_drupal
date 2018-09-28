pipeline {
  agent any
  stages {
    stage('Pull') {
      steps {
        sh 'git pull origin 8.x-1.x'
      }
    }
    stage('Push') {
      steps {
        sh 'git push git@github.com:blakemorgan/drupal-mirror-test.git/:refs/heads/8.x-1.x'
      }
    }
  }
}

