module.exports = function(grunt) {
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		uglify: {
			eshop: {
				files: [{
					expand: true,
					cwd: 'js/',
					src: '**/*.js', 
					dest: 'js/',
					ext: '.min.js'
				},{
					expand: true,
					cwd: 'chunks/',
					src: '**/*.js', 
					dest: 'chunks/',
					ext: '.min.js'
				}]
			}
		},
		cssmin: {
			minify: {
				expand: true,
				cwd: 'css/',
				src: ['*.css', '!*.min.css'],
				dest: 'css/',
				ext: '.min.css'
			}
		}
	});
	
	// Load the plugin that provides the "uglify" task.
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	
	// Default task(s).
	grunt.registerTask('default', ['uglify', 'cssmin']);
};
