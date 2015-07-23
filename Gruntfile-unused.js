module.exports = function(grunt) {
	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		cssmin: {
			combine: {
				files: {
					'assets/css/custom.min.css': [
						'assets/css/slider.css',
						'assets/css/bootstrap.min.css',
						'assets/css/custom.css',
						'assets/css/media-queries.css',
						'assets/css/video.css',
						'assets/css/main-slider.css',
						'assets/css/video-carousel.css'
					],
					'assets/css/features.min.css': [
						'assets/css/bootstrap.min.css',
						'assets/css/custom.css',
						'assets/css/media-queries.css',
						'assets/css/features-videos.css'
					]
				}
			}
		},

		watch: {
			scripts: {
				files: ['**/*.*'],
				tasks: ['cssmin'],
				options: {
					interrupt: true,
					livereload: true
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['cssmin', 'watch']);
};