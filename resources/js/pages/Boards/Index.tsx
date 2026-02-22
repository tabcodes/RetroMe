import AppLayout from '@/layouts/app-layout';
import { BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import React from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create Board',
        href: '/boards',
    },
];

const BoardIndex: React.FC = () => {
    return(
        <AppLayout breadcrumbs={breadcrumbs}>

            test 2
        </AppLayout>
    )
}

export default BoardIndex;