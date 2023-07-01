import { User } from "@/types";

type Props = {
    users: User[];
}

export default function UsersList({ users }: Props) {
    return (
        <section>
            <h1>ユーザー一覧</h1>
            <ul>
                {users.map((user) => (
                    <li key={user.id}>
                        {user.name} ({user.email})
                    </li>
                ))}
            </ul>
        </section>
    );
}
