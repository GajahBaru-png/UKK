// resources/js/Pages/Dashboard.tsx

import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'Dashboard', href: '/dashboard' },
];

type Profile = {
    nama: string;
    nis: string;
    email: string;
    status_pkl: boolean;
};

type Props = {
    profiles: Profile[];
};

export default function Dashboard({ profiles }: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex flex-col gap-4 p-4">
                {
                    profiles.map((profile) => (
                        <div key={profile.nis} className="p-4 border rounded shadow-sm">
                            <h3 className="font-semibold">{profile.nama}</h3>
                            <p>NIS: {profile.nis}</p>
                            <p>Email: {profile.email}</p>
                            <p>Status PKL: {profile.status_pkl ? 'Aktif' : 'Tidak Aktif'}</p>
                        </div>
                    ))
                }
            </div>
        </AppLayout>
    );
}
