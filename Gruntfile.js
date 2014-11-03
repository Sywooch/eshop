module.exports = function(grunt) {
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			build: {
				files: {
					'js/output.min.js': [
					    'colorbox/jquery.colorbox.js',
					    'colorbox/i18n/jquery.colorbox-ru.js',
					    'js/ya-share.js',
					    'js/rpc.js',
					    'js/default.js'
					],
					'js/crypt.min.js': 'js/crypt.js'
				}
			}
		},
		cssmin: {
			minify: {
				files: {
					'css/output.min.css': [
					    'css/colorbox.css',
					    'css/default.css'
					]
				}
			}
		},
		jshint: {
			all: ['Gruntfile.js', 'js/default.js', 'js/rpc.js', 'js/ya-share.js', 'js/crypt.js']
		},
		watch: {
			scripts: {
				files: ['js/*', '!js/output.min.js', 'css/*', '!css/output.min.css'],
				tasks: ['uglify', 'jshint', 'cssmin']
			},
		}
	});
	
	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	
	// Default task(s).
	grunt.registerTask('default', ['uglify', 'cssmin', 'jshint']);
};
