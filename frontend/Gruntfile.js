module.exports = function (grunt) {
    grunt.initConfig({
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    "web/css/site.css": "views/scss/site.scss"
                }
            },
        },
        watch: {
            sass: {
                files: [
                    'views/scss/*.scss',
                    'views/scss/**/*.scss',
                ],
                tasks: ['sass'],
                options: {
                    livereload: true
                }
            },
        }
    });

    // Plugin loading
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');

    // Task definition
    grunt.registerTask('default', ['watch']);
};