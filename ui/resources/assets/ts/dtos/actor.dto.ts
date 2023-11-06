import { Movie } from "./movie.dto";

export type Actor = {
    id: number;
    name: string;
    imageUrl: string;
    movies: Movie[];
}