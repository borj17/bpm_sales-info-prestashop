/* eslint-disable no-undef */
const path = require('path');

// include the js minification plugin
const TerserJSPlugin = require('terser-webpack-plugin');

// include the css extraction and minification plugins
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const __home = path.resolve(__dirname, '');
const OptimizeCSSAssetsPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
    mode: 'production',
    entry: ['./js/src/app.js', './css/src/app.scss'],
    stats: {
        warnings: false
    },
    output: {
        filename: './js/build/theme.min.js',
        path: __home,
    },
    module: {
        rules: [
            // perform js babelization on all .js files
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                },
            },
            // compile all .scss files to plain old css
            {
                test: /\.(sass|scss)$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
            },
        ],
    },
    plugins: [
        // extract css into dedicated file
        new MiniCssExtractPlugin({
            filename: './css/salesinfo.css',
        }),
    ],
    optimization: {
        minimize: true,
        minimizer: [
            // enable the js minification plugin
            new TerserJSPlugin(),
            // enable the css minification plugin
            new OptimizeCSSAssetsPlugin(),
        ],
    },
};
