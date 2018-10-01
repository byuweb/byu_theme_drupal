pipeline {
  agent any
  stages {
    stage('Pull') {
      steps {
        sh 'git pull origin 7.x-3.x --tags'
        sh 'git pull origin 7.x-3.x'
      }
    }
    stage('Push') {
      steps {
        sh 'git push git@github.com:byuweb/byu_theme_drupal.git HEAD:refs/heads/7.x-3.x'
        sh 'git push git@github.com:byuweb/byu_theme_drupal.git --tags'
      }
    }
  }
}
