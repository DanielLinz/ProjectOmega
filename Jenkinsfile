node {
    stage('Build') {
         checkout([$class: 'GitSCM', branches: [[name: '**']], doGenerateSubmoduleConfigurations: false, extensions: [], submoduleCfg: [], userRemoteConfigs: [[url: 'https://github.com/Zweistein2/ProjectOmega.git']]])
         echo 'Building..'
   }

    stage('Deploy') {
      def matcher = env.BRANCH_NAME =~ /^.*_(.*)$/
      String branch = matcher[0][1]
      steps {
         sh """
            #!/bin/bash
            mkdir -r /var/www/html/cd/${branch}/
            cp -r * /var/www/html/cd/${branch}/
         """
      }
   }
}