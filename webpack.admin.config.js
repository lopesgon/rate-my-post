var path = require('path');

var config = {
  optimization: {
    minimize: false
  },
  externals: {
    jquery: 'jQuery',
    rmp_options: 'rmp_options',
  },
  mode: 'development',
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      }
    ]
  },
};

var adminScripts = Object.assign({}, config, {
    entry: "./_dev/admin/js/rate-my-post-admin.js",
    output: {
       path: path.resolve(__dirname, './admin/js'),
       filename: "rate-my-post-admin.js"
    },
});

module.exports = [
    adminScripts,
];
