import { Actor } from "./actor.dto";

export type Movie = {
    id: number
    title: string
    releaseYear: number
    description: string
    imageUrl: string
    actors: Actor[]
}