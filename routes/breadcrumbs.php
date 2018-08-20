<?php

    // ADMIN
    // Dash board
    Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
        $breadcrumbs->push(__('admin/breadcrumb.dashboard'), route('admin.dashboard'));
    });

    // Clinic types
    Breadcrumbs::register('admin.clinic-types.index', function ($breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(__('admin/breadcrumb.clinic_types'), route('admin.clinic-types.index'));
    });
    Breadcrumbs::register('admin.clinic-types.edit', function ($breadcrumbs, $clinicType) {
        $breadcrumbs->parent('admin.clinic-types.index');
        $breadcrumbs->push($clinicType->id . ' / ' . __('admin/breadcrumb.action.edit'), route('admin.clinic-types.edit', $clinicType->id));
    });
    Breadcrumbs::register('admin.clinic-types.create', function ($breadcrumbs) {
        $breadcrumbs->parent('admin.clinic-types.index');
        $breadcrumbs->push(__('admin/breadcrumb.action.create'), route('admin.clinic-types.create'));
    });

    // Clinics
    Breadcrumbs::register('admin.clinics.index', function ($breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(__('admin/breadcrumb.clinics'), route('admin.clinics.index'));
    });
    Breadcrumbs::register('admin.clinics.show', function ($breadcrumbs, $clinic) {
        $breadcrumbs->parent('admin.clinics.index');
        $breadcrumbs->push($clinic->id, route('admin.clinics.show', $clinic->id));
    });
    Breadcrumbs::register('admin.clinics.edit', function ($breadcrumbs, $clinic) {
        $breadcrumbs->parent('admin.clinics.show', $clinic);
        $breadcrumbs->push(__('admin/breadcrumb.action.edit'), route('admin.clinics.edit', $clinic->id));
    });
    Breadcrumbs::register('admin.clinics.create', function ($breadcrumbs) {
        $breadcrumbs->parent('admin.clinics.index');
        $breadcrumbs->push(__('admin/breadcrumb.action.create'), route('admin.clinics.create'));
    });

    // Users
    Breadcrumbs::register('admin.users.index', function ($breadcrumbs) {
        $breadcrumbs->parent('admin.dashboard');
        $breadcrumbs->push(__('admin/breadcrumb.users'), route('admin.users.index'));
    });
    Breadcrumbs::register('admin.users.show', function ($breadcrumbs, $user) {
        $breadcrumbs->parent('admin.users.index');
        $breadcrumbs->push($user->id , route('admin.users.show', $user->id));
    });

    // ADMIN CLINIC
    // Dashboard
    Breadcrumbs::register('admin_clinic.dashboard', function ($breadcrumbs, $clinic) {
        $breadcrumbs->push(__('admin_clinic/breadcrumb.dashboard'), route('admin_clinic.dashboard', $clinic->slug));
    });

    // Calendar
    Breadcrumbs::register('admin_clinic.calendar', function ($breadcrumbs, $clinic) {
        $breadcrumbs->parent('admin_clinic.dashboard', $clinic);
        $breadcrumbs->push(__('admin_clinic/breadcrumb.calendar'), route('admin_clinic.calendar', $clinic->slug));
    });

    // Appointments
    Breadcrumbs::register('admin_clinic.appointments.index', function ($breadcrumbs, $clinic) {
        $breadcrumbs->parent('admin_clinic.dashboard', $clinic);
        $breadcrumbs->push(__('admin_clinic/breadcrumb.appointments'), route('admin_clinic.appointments.index', $clinic->slug));
    });
    Breadcrumbs::register('admin_clinic.appointments.show', function ($breadcrumbs, $clinic, $appointment) {
        $breadcrumbs->parent('admin_clinic.appointments.index', $clinic);
        $breadcrumbs->push($appointment->id, route('admin_clinic.appointments.show', [$clinic->slug, $appointment->id]));
    });

    // Profile
    Breadcrumbs::register('admin_clinic.profile.show', function ($breadcrumbs, $clinic) {
        $breadcrumbs->parent('admin_clinic.dashboard', $clinic);
        $breadcrumbs->push(__('admin_clinic/breadcrumb.profile'), route('admin_clinic.profile.show', $clinic->slug));
    });
    Breadcrumbs::register('admin_clinic.profile.edit', function ($breadcrumbs, $clinic) {
        $breadcrumbs->parent('admin_clinic.profile.show', $clinic);
        $breadcrumbs->push(__('admin_clinic/breadcrumb.clinic'), route('admin_clinic.profile.edit', $clinic->slug));
    });
    Breadcrumbs::register('admin_clinic.profile.account.edit', function ($breadcrumbs, $clinic) {
        $breadcrumbs->parent('admin_clinic.profile.show', $clinic);
        $breadcrumbs->push(__('admin_clinic/breadcrumb.admin'), route('admin_clinic.profile.account.edit', $clinic->slug));
    });



