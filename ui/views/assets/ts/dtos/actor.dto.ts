import { Movie } from "./movie.dto";

export type Actor = {
    id: number;
    name: string;
    movies: Movie[];
}