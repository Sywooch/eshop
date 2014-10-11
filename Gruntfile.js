module.exports = function(grunt) {
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			build: {
				files: [{
					expand: true,
					cwd: 'js/',
					src: ['**/*.js','!**/*.min.js'], 
					dest: 'js/',
					ext: '.min.js'
				}]
			}
		},
		cssmin: {
			minify: {
				files: [{
					expand: true,
					cwd: 'css/',
					src: ['*.css','!*.min.css'],
					dest: 'css/',
					ext: '.min.css'
				},{
					expand: true,
					cwd: 'colorbox/',
					src: ['colorbox.css','!colorbox.min.css'], 
					dest: 'colorbox/',
					ext: '.min.css'
				}]
			}
		},
		jshint: {
			all: ['Gruntfile.js', 'js/default.js', 'js/rpc.js', 'js/ya-share.js']
		}
	});
	
	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	
	// Default task(s).
	grunt.registerTask('default', ['uglify', 'cssmin', 'jshint']);
};
