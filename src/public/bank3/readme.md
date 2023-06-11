# Step 1. Install Mix
Begin by installing Laravel Mix through NPM or Yarn.
# `mkdir my-app && cd my-app`
# `npm init -y`
# `npm install laravel-mix --save-dev`

# Step 2. Create a Mix Configuration File
Next, create a Mix configuration file within the root of your new project.
# `touch webpack.mix.js`

# Step 3. Define Your Compilation
Open webpack.mix.js and add the following code:
### `//webpack.mix.js`
### `let mix = require('laravel-mix');`
### `mix.sass('src/app.scss', 'public').js('src/app.js', 'public');`

# Step 4. Compile
# `npx mix`

# Bootstrap 5 install
# `npm install bootstrap`
# `npm i bootstrap-icons`
