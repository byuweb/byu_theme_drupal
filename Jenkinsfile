pipeline {
  agent any
  stages {
    stage('Pull') {
      steps {
        sh 'git pull origin 8.x-3.x --tags'
        sh 'git pull origin 8.x-3.x'
      }
    }
    stage('Push') {
      steps {
        sh 'git push git@github.com:byuweb/byu_drupal_theme.git HEAD:refs/heads/8.x-3.x'
        sh 'git push git@github.com:byuweb/byu_drupal_theme.git --tags'
      }
    }
  }
}

