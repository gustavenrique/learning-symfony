const
    path = require('path'),
    webpack = require('webpack');

module.exports = {
    context: process.cwd(),

    entry: {
        vendor: ['axios', 'vue', '@inertiajs/vue3', 'vuetify', 'sass']
    },

    output: {
        filename: '[name].dll.js',
        path: path.resolve(__dirname, 'public', 'dll'),
        library: '[name]'
    },

    plugins: [
        new webpack.DllPlugin({
            name: '[name]',
            path: path.resolve(__dirname, 'public', 'dll', '[name].json')
        })
    ]
}