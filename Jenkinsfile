pipeline {
  agent any
  stages {
    stage('Pull') {
      steps {
        sh 'git pull origin 8.x-1.x --tags'
        sh 'git pull origin 8.x-1.x'
      }
    }
    stage('Push') {
      steps {
        sh 'git push git@github.com:byuweb/byu_theme_drupal.git HEAD:refs/heads/8.x-1.x'
        sh 'git push git@github.com:byuweb/byu_theme_drupal.git --tags'
      }
    }
  }
}
