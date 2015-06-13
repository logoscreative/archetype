module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    jshint: {
      all: [
        'Gruntfile.js',
        'assets/dev/js/main.js',
        '!assets/dev/js/scripts.min.js'
      ]
    },
    less: {
      dist: {
        options: {
          compress: true,
          sourceMap: false
        },
        files: {
          'assets/dist/css/main.min.css': [
            'assets/dev/less/main.less'
          ]
        }
      }
    },
    autoprefixer: {
      single_file: {
        src: 'assets/dist/css/main.min.css',
        dest: 'assets/dist/css/main.min.css'
      }
    },
    uglify: {
      options: {
        compress: true
      },
      build: {
        src: [
          'bower_components/bootstrap/dist/js/bootstrap.js',
          'assets/dev/js/main.js'
        ],
        dest: 'assets/dist/js/scripts.min.js'
      }
    },
    imageoptim: {
      src: [
        'assets/dist/img'
      ],
      options: {
        quitAfter: true
      }
    },
    watch: {
      less: {
        files: [
          'assets/dev/less/custom-variables.less',
          'assets/dev/less/custom-other.less'
        ],
        tasks: ['less']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify']
      }
    },
    clean: {
      dist: [
        'assets/dist/css/main.min.css',
        'assets/dist/js/scripts.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-imageoptim');
  grunt.loadNpmTasks('grunt-autoprefixer');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'less',
    'autoprefixer',
    'uglify'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);
  grunt.registerTask('image', [
    'imageoptim'
  ]);

};