import './styles/app.sass';

console.log('HELLO FROM app.ts!');

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