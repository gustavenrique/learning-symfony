import { Actor } from "./actor.dto";

export class Movie {
    public constructor(
        public readonly id: number,
        public readonly title: string,
        public readonly releaseYear: number,
        public readonly description: string,
        public readonly imageUrl: string,
        public readonly actors: Actor[],
    ) {
    }
}