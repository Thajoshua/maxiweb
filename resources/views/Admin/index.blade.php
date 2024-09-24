    <x-adminlayout heading="Dashboard">

        <!-- Insights -->
        <ul class="insights">
            <li>

                <i class="bx fa-solid fa-user"></i>
                <span class="info">
                    <h3>
                        1,074
                    </h3>
                    <p> Total user</p>
                </span>
            </li>
            <li>
                <i class=" bx fa-solid fa-eye"></i>
                {{-- <i class='bx bx-show-alt'></i> --}}
                <span class="info">
                    <h3>
                        3,944
                    </h3>
                    <p>Site Visit</p>
                </span>
            </li>

        </ul>
        <!-- End of Insights -->

        <div class="bottom-data">
            <div class="orders">
                <div class="header">
                    <i class='bx bx-receipt'></i>
                    <h3><i class="fa-solid fa-users"></i> users</h3>
                    <i class='bx bx-filter'></i>
                    <i class='bx bx-search'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Registered At</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr data-user-id="{{ $user->id }}" class="user-row" >
                                <td >

                                    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Ficonduck.com%2Ficons%2F180867%2Fprofile-circle&psig=AOvVaw1Dcfct6O2uy3YGSZ3FNiR7&ust=1727034125886000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCPif5s_l1IgDFQAAAAAdAAAAABAf" alt="Profile Picture">
                                    <p class="user-name">{{ $user->name }}</p>
                                </td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>

                                <td>
                                    <span
                                        class="user-balance status completed">${{ number_format($user->account->balance, 2) }}</span>
                                </td>

                                <!-- Hidden fields for modal population -->
                                <td style="display:none;" class="user-email">{{ $user->email }}</td>
                                <td style="display:none;" class="user-deposits">{{ $user->account->deposits ?? 0 }}</td>
                                <td style="display:none;" class="user-withdrawals">
                                    {{ $user->account->withdrawals ?? 0 }}</td>
                            </tr>
                        @endforeach
                    </tbody>



                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders">
                <div class="header">
                    <i class='bx bx-note'></i>
                    <h3>Remiders</h3>
                    <i class='bx bx-filter'></i>
                    <i class='bx bx-plus'></i>
                </div>
                <ul class="task-list">
                    <li class="completed">
                        <div class="task-title">
                            <i class='bx bx-check-circle'></i>
                            <p>Start Our Meeting</p>
                        </div>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>
                    <li class="completed">
                        <div class="task-title">
                            <i class='bx bx-check-circle'></i>
                            <p>Analyse Our Site</p>
                        </div>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>
                    <li class="not-completed">
                        <div class="task-title">
                            <i class='bx bx-x-circle'></i>
                            <p>Play Footbal</p>
                        </div>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>
                </ul>
            </div>

            <!-- End of Reminders-->

        </div>

    </x-adminlayout>
