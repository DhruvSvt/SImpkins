<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- dashboard --}}
        <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link"><i class="fa fa-home menu-icon"></i> <span
                    class="menu-title">{{ __('dashboard') }}</span></a>
        </li>

        @hasrole('Super Admin')
            {{-- academics --}}
            @canany(['medium-create', 'section-create', 'subject-create', 'class-create', 'subject-create',
                'class-teacher-create', 'subject-teacher-list', 'subject-teachers-create', 'assign-class-to-new-student',
                'promote-student-create'])
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#academics-menu" aria-expanded="false"
                        aria-controls="academics-menu"><i class="fa fa-university menu-icon"></i> <span
                            class="menu-title">{{ __('academics') }}</span> </a>
                    <div class="collapse" id="academics-menu">
                        <ul class="nav flex-column sub-menu">
                            @can('medium-create')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('medium.index') }}"> {{ __('medium') }} </a>
                                </li>
                            @endcan

                            @can('section-create')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('section.index') }}"> {{ __('section') }} </a>
                                </li>
                            @endcan

                            @can('subject-create')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('subject.index') }}"> {{ __('subject') }} </a>
                                </li>
                            @endcan

                            @can('class-create')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('class.index') }}"> {{ __('class') }} </a>
                                </li>
                            @endcan

                            @can('subject-create')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('class.subject') }}">{{ __('assign_class_subject') }} </a>
                                </li>
                            @endcan
                            @can('class-teacher-create')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('class.teacher') }}">
                                        {{ __('assign_class_teacher') }}
                                    </a>
                                </li>
                            @endcan

                            @canany(['subject-teacher-list', 'subject-teacher-create', 'subject-teacher-edit',
                                'subject-teacher-delete'])
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('subject-teachers.index') }}">
                                        {{ __('assign') . ' ' . __('subject') . ' ' . __('teacher') }}
                                    </a>
                                </li>
                            @endcan
                            @can('assign-class-to-new-student')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('students.assign-class') }}">
                                        {{ __('assign_new_student_class') }}
                                    </a>
                                </li>
                            @endcan
                            @can('promote-student-create')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('promote-student.index') }}">
                                        {{ __('promote_student') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcanany
        @endrole

        {{-- student --}}
        @canany(['student-create', 'student-list', 'category-create', 'student-reset-password', 'class-teacher'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#student-menu" aria-expanded="false"
                    aria-controls="academics-menu"><i class="fa fa-graduation-cap menu-icon"></i> <span
                        class="menu-title">{{ __('students') }}</span>

                </a>
                <div class="collapse" id="student-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('student-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('students.create') }}">
                                    {{ __('student_admission') }}
                                </a>
                            </li>
                        @endcan

                        @canany(['student-list', 'class-teacher'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('students.index') }}">
                                    {{ __('student_details') }}
                                </a>
                            </li>
                        @endcanany

                        @can('category-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.index') }}">
                                    {{ __('student_category') }}
                                </a>
                            </li>
                        @endcan
                        @can('student-reset-password')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('students.reset_password') }}">
                                    {{ __('students') . ' ' . __('reset_password') }}
                                </a>
                            </li>
                        @endcan
                        @if (Auth::user()->hasRole('Super Admin'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('students.create-bulk-data') }}">
                                    {{ __('add_bulk_data') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>
        @endcanany

        {{-- stuedent attendance --}}
        @canany(['student-create', 'student-list', 'category-create', 'student-reset-password', 'class-teacher'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#student-att-menu" aria-expanded="false"
                    aria-controls="academics-menu"><i class="fa fa-graduation-cap menu-icon"></i> <span
                        class="menu-title">{{ __('students attendance') }}</span>

                </a>
                <div class="collapse" id="student-att-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('student-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('students.create') }}">
                                    {{ __('mark attendance') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany
        

        {{-- employee --}}
        @canany(['employee-list', 'employee-create', 'employee-edit', 'employee-delete'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#employee-menu" aria-expanded="false"
                    aria-controls="academics-menu">
                    <i class="fa fa-users menu-icon"></i>
                    <span class="menu-title">{{ __('employee') }}</span>
                </a>
                <div class="collapse" id="employee-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('employee-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employees.create') }}">
                                    {{ __('employee_add') }}
                                </a>
                            </li>
                        @endcan
                        @can('employee-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employees.index') }}">
                                    {{ __('employee_details') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany

        {{-- menu --}}
        {{-- @canany(['menu-list', 'menu-edit', 'menu-delete']) --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu-menu" aria-expanded="false"
                aria-controls="academics-menu">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">{{ __('menu') }}</span>
            </a>
            <div class="collapse" id="menu-menu">
                <ul class="nav flex-column sub-menu">
                    {{-- @can('menu-list') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menus.index') }}">
                            {{ __('menu_details') }}
                        </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('menu-list') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.create') }}">
                            {{ __('page_add') }}
                        </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('menu-list') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.index') }}">
                            {{ __('page_details') }}
                        </a>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('menu-list') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery.create') }}">
                            {{ __('gallery_add') }}
                        </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('menu-list') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery.index') }}">
                            {{ __('gallery_details') }}
                        </a>
                    </li>
                    {{-- @endcan --}}
                </ul>
            </div>
        </li>
        {{-- @endcanany --}}

        {{-- @canany(['event-notice-list', 'event-notice-edit', 'event-notice-delete']) --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#event-notice-menu" aria-expanded="false"
                aria-controls="academics-menu">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">{{ __('event-notice') }}</span>
            </a>
            <div class="collapse" id="event-notice-menu">
                <ul class="nav flex-column sub-menu">
                    {{-- @can('menu-list') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('event-notice.create') }}">
                            {{ __('event-notice-add') }}
                        </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('menu-list') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('event-notice.index') }}">
                            {{ __('event-notice-details') }}
                        </a>
                    </li>
                    {{-- @endcan --}}
                </ul>
            </div>
        </li>
        {{-- @endcanany --}}

        {{-- @canany(['event-notice-list', 'event-notice-edit', 'event-notice-delete']) --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#enquiry-menu" aria-expanded="false"
                aria-controls="academics-menu">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">{{ __('enquiry') }}</span>
            </a>
            <div class="collapse" id="enquiry-menu">
                <ul class="nav flex-column sub-menu">
                    {{-- @can('menu-list') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact-enquiry.index') }}">
                            {{ __('contact-enquiry') }}
                        </a>
                    </li>
                    {{-- @endcan --}}
                </ul>
            </div>
        </li>
        {{-- @endcanany --}}

        {{-- Front Office --}}
        @canany(['admission-enquiry-list', 'admission-enquiry-create', 'admission-enquiry-edit',
            'admission-enquiry-delete', 'visitor-book-list', 'visitor-book-create', 'visitor-book-edit',
            'visitor-book-delete', 'resume-submit-list', 'resume-submit-create', 'resume-submit-edit',
            'resume-submit-delete'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#front_office-menu" aria-expanded="false"
                    aria-controls="academics-menu">
                    <i class="fa fa-building-o menu-icon"></i>
                    <span class="menu-title">{{ __('front-office') }}</span>
                </a>
                <div class="collapse" id="front_office-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('admission-enquiry-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admission-enquiry.create') }}">
                                    {{ __('admission-enquiry') . ' ' . _('add') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admission-enquiry.index') }}">
                                    {{ __('admission-enquiry') . ' ' . _('details') }}
                                </a>
                            </li>
                        @endcan

                        @can('visitor-book-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('visitor-book.create') }}">
                                    {{ __('student-book') . ' ' . _('add') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('visitor-book.index') }}">
                                    {{ __('student-book') . ' ' . _('details') }}
                                </a>
                            </li>
                        @endcan

                        @can('resume-submit-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('resume-submit.create') }}">
                                    {{ __('resume-submit') . ' ' . _('add') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('resume-submit.index') }}">
                                    {{ __('resume-submit') . ' ' . _('details') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany

        {{-- Attendance for admin --}}
        @if (Auth::user()->hasRole('Super Admin'))
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#attendance-menu" aria-expanded="false"
                    aria-controls="attendance-menu"><i class="fa fa-check menu-icon"></i> <span
                        class="menu-title">{{ __('attendance') }}</span> </a>
                <div class="collapse" id="attendance-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('attendance-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('attendance.index') }}">
                                    {{ __('add_attendance') }}
                                </a>
                            </li>
                        @endcan

                        {{-- view attendance --}}
                        @can('attendance-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('attendance.view') }}">
                                    {{ __('view_attendance') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif

        {{-- teacher --}}
        @can('teacher-create')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#teacher-menu" aria-expanded="false"
                    aria-controls="academics-menu">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">{{ __('teacher') }}</span>
                </a>
                <div class="collapse" id="teacher-menu">
                    <ul class="nav flex-column sub-menu">
                        {{-- @can('teacher-list') --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teachers.create') }}">
                                {{ __('teacher_add') }}
                            </a>
                        </li>
                        {{-- @endcan --}}
                        {{-- @can('teacher-list') --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teachers.index') }}">
                                {{ __('teacher_details') }}
                            </a>
                        </li>
                        {{-- @endcan --}}

                        @if (Auth::user()->hasRole('Super Admin'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('teachers.create-bulk-data') }}">
                                    {{ __('add_bulk_data') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>
        @endcan

        {{-- aluminai start --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#aluminai-menu" aria-expanded="false"
                aria-controls="academics-menu">
                <i class="fa fa-user menu-icon"></i>
                <span class="menu-title">{{ __('aluminai') }}</span>
            </a>
            <div class="collapse" id="aluminai-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aluminai.create') }}">
                            {{ __('Aluminai Add') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aluminai.index') }}">
                            {{ __('Aluminai Details') }}
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- aluminai end --}}

        {{-- Success Story start --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#success_story-menu" aria-expanded="false"
                aria-controls="academics-menu">
                <i class="fa fa-user menu-icon"></i>
                <span class="menu-title">{{ __('success_story') }}</span>
            </a>
            <div class="collapse" id="success_story-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('success_story.create') }}">
                            {{ __('Success Story Add') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('success_story.index') }}">
                            {{ __('Success Story Details') }}
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- Success Story end --}}

        {{-- parents --}}
        @can('parents-create')
            <li class="nav-item">
                <a href="{{ route('parents.index') }}" class="nav-link"><i class="fa fa-users menu-icon"></i> <span
                        class="menu-title">{{ __('parents') }}</span> </a>
            </li>
        @endcan

        {{-- timetable --}}
        @canany(['timetable-create', 'class-timetable', 'teacher-timetable'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#timetable-menu" aria-expanded="false"
                    aria-controls="timetable-menu"> <i class="fa fa-calendar menu-icon"></i> <span
                        class="menu-title">{{ __('timetable') }}</span>

                </a>
                <div class="collapse" id="timetable-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('timetable-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('timetable.index') }}">{{ __('create_timetable') }}
                                </a>
                            </li>
                        @endcan
                        @canany(['class-timetable', 'class-teacher'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('class-timetable') }}">
                                    {{ __('class_timetable') }}
                                </a>
                            </li>
                        @endcanany
                        @can('teacher-timetable')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('teacher-timetable') }}">
                                    {{ __('teacher_timetable') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany

        {{-- Holiday --}}
        @canany(['holiday-create', 'holiday-list'])
            <li class="nav-item">
                @can('holiday-list')
                    <a href="{{ route('holiday.index') }}" class="nav-link"> <i
                            class="fa fa-calendar-check-o menu-icon"></i> <span
                            class="menu-title">{{ __('holiday_list') }}</span> </a>
                @endcan
            </li>
        @endcanany

        {{-- subject lesson --}}
        @canany(['lesson-list', 'lesson-create', 'lesson-edit', 'lesson-delete', 'topic-list', 'topic-create',
            'topic-edit', 'topic-delete'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#subject-lesson-menu" aria-expanded="false"
                    aria-controls="subject-lesson-menu"><i class="fa fa-book menu-icon"></i> <span
                        class="menu-title">{{ __('subject_lesson') }}</span> </a>
                <div class="collapse" id="subject-lesson-menu">
                    <ul class="nav flex-column sub-menu">
                        @canany(['lesson-list', 'lesson-create', 'lesson-edit', 'lesson-delete'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('lesson') }}"> {{ __('create_lesson') }}</a>
                            </li>
                        @endcanany

                        @canany(['topic-list', 'topic-create', 'topic-edit', 'topic-delete'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('lesson-topic') }}"> {{ __('create_topic') }}</a>
                            </li>
                        @endcanany
                    </ul>
                </div>
            </li>
        @endcanany

        {{-- student assignment --}}
        @canany(['assignment-create', 'assignment-submission'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#student-assignment-menu" aria-expanded="false"
                    aria-controls="student-assignment-menu"><i class="fa fa-tasks menu-icon"></i> <span
                        class="menu-title">{{ __('student_assignment') }}</span> </a>
                <div class="collapse" id="student-assignment-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('assignment-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('assignment.index') }}">
                                    {{ __('create_assignment') }}
                                </a>
                            </li>
                        @endcan
                        @can('assignment-submission')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('assignment.submission') }}">
                                    {{ __('assignment_submission') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany
        @can('slider-create')
            <li class="nav-item">
                <a href="{{ route('sliders.index') }}" class="nav-link"><i class="fa fa-list menu-icon"></i> <span
                        class="menu-title">{{ __('sliders') }}</span> </a>
            </li>
        @endcan

        {{-- attendance --}}
        @canany(['class-teacher'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#attendance-menu" aria-expanded="false"
                    aria-controls="attendance-menu"><i class="fa fa-check menu-icon"></i> <span
                        class="menu-title">{{ __('attendance') }}</span> </a>
                <div class="collapse" id="attendance-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('attendance-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('attendance.index') }}">
                                    {{ __('add_attendance') }}
                                </a>
                            </li>
                        @endcan

                        {{-- view attendance --}}
                        @can('attendance-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('attendance.view') }}">
                                    {{ __('view_attendance') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany

        
        {{-- announceent --}}
        @can('announcement-create')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('announcement.index') }}"><i class="fa fa-check menu-icon"></i>
                    <span class="menu-title">{{ __('announcement') }}</span>
                </a>
            </li>
        @endcan
        {{-- exam --}}
        @canany(['exam-create', 'exam-timetable-create', 'exam-upload-marks', 'grade-create'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#exam-menu" aria-expanded="false"
                    aria-controls="exam-menu">
                    <i class="fa fa-book menu-icon"></i> <span class="menu-title">{{ __('exam') }}</span>

                </a>
                <div class="collapse" id="exam-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('exam-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('exams.index') }}"> {{ __('create_exam') }}
                                </a>
                            </li>
                        @endcan
                        @can('exam-timetable-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('exam-timetable.index') }}">
                                    {{ __('create_exam_timetable') }}
                                </a>
                            </li>
                        @endcan
                        @can('class-teacher')
                            @can('exam-upload-marks')

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('exams.upload-marks') }}">
                                        {{ __('upload') }} {{ __('exam_marks') }}
                                    </a>
                                </li>
                            @endcan
                            @can('exam-result')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('exams.get-result') }}">
                                        {{ __('students') }} {{ __('exam_result') }}
                                    </a>
                                </li>
                            @endcan
                        @endcan
                        @can('grade-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('grades') }}">
                                    {{ __('exam') }} {{ __('grade') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcan
        {{-- session-year --}}
        @can('session-year-create')
            <li class="nav-item">
                <a href="{{ route('session-years.index') }}" class="nav-link"> <i
                        class="fa fa-calendar-o menu-icon"></i> <span
                        class="menu-title">{{ __('session_years') }}</span>
                </a>
            </li>
        @endcan
        {{-- settings --}}
        @canany(['setting-create', 'fcm-setting-create', 'email-setting-create', 'privacy-policy', 'contact-us',
            'about-us', 'role-create'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#settings-menu" aria-expanded="false"
                    aria-controls="settings-menu"><i class="fa fa-cog menu-icon"></i> <span
                        class="menu-title">{{ __('system_settings') }}</span> </a>
                <div class="collapse" id="settings-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('setting-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('app-settings') }}">
                                    {{ __('app_settings') }}</a>
                            </li>
                        @endcan
                        @can('setting-create')
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link" href="{{ url('settings') }}">-->
                            <!--        {{ __('general_settings') }}</a>-->
                            <!--</li>-->
                        @endcan
                        @can('language-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('language') }}">
                                    {{ __('language_settings') }}</a>
                            </li>
                        @endcan
                        @can('fcm-setting-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('fcm-settings') }}"> {{ __('fcm_key') }}
                                </a>
                            </li>
                        @endcan
                        @can('email-setting-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('email-settings') }}">
                                    {{ __('email_configuration') }}
                                </a>
                            </li>
                        @endcan
                        @can('privacy-policy')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('privacy-policy') }}">
                                    {{ __('privacy_policy') }}
                                </a>
                            </li>
                        @endcan
                        @can('contact-us')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('contact-us') }}"> {{ __('contact_us') }}
                                </a>
                            </li>
                        @endcan
                        @can('about-us')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('about-us') }}"> {{ __('about_us') }}
                                </a>
                            </li>
                        @endcan
                        @can('terms-condition')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('terms-condition') }}">
                                    {{ __('terms_condition') }}
                                </a>
                            </li>
                        @endcan
                        @can('role-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('roles/') }}"> {{ __('role_permission') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endif

            @if (Auth::user()->hasRole('Super Admin'))
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" href="{{ route('system-update.index') }}">-->
                <!--        <span class="menu-title">{{ __('system_update') }}</span>-->
                <!--        <i class="fa fa-cloud-download menu-icon"></i> </a>-->
                <!--</li>-->
            @endif

        </ul>
    </nav>
