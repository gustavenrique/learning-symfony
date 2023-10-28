/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.sass';

class User {
    constructor(
        private readonly id: number,
        private readonly name: string,
        private readonly birthdate: Date,
    ) {
    }
};

console.log(new User(
    1, 
    'John Doe', 
    new Date('10-09-1970')
));

alert('testing')
console.log('testing')