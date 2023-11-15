export type Role = 'ROLE_USER' | 'ROLE_ADMIN'

export type User = {
    username: string;
    roles: Role[]
} | null;