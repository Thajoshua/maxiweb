<x-adminlayout heading="Users">

    <div class="bottom-data">
        <div class="orders">
            <div class="header">
                <i class='bx bx-receipt'></i>
                <h3><i class="fa-solid fa-users"></i> All Users</h3>
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
                            <tr data-user-id="{{ $user->id }}" class="user-row">
                                <td>
                                    <img src="images/profile-1.jpg" alt="Profile Picture">
                                    <p class="user-name">{{ $user->name }}</p>
                                </td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <span class="user-balance status completed">${{ number_format($user->account->balance, 2) }}</span>
                                </td>

                                <!-- Hidden fields for modal population -->
                                <td style="display:none;" class="user-email">{{ $user->email }}</td>
                                <td style="display:none;" class="user-deposits">{{ $user->account->deposits ?? 0 }}</td>
                                <td style="display:none;" class="user-withdrawals">{{ $user->account->withdrawals ?? 0 }}</td>
                            </tr>
                        @endforeach
                    </tbody>



            </table>
        </div>
    </div>

   <!-- Modal -->
<div class="modal" id="userModal" style="display:none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>User Details</h2>
        <!-- Update User Form -->
        <form id="userForm" method="POST" action="">
            @csrf
            @method('PUT') <!-- Use PUT or PATCH for updating -->

            <input type="hidden" name="user_id" id="modalUserId">

            <div>
                <label for="userName">Name:</label>
                <input type="text" name="name" id="userName" required>
            </div>

            <div>
                <label for="userEmail">Email:</label>
                <input type="email" name="email" id="userEmail" required>
            </div>

            <div>
                <label for="userBalance">Balance:</label>
                <input type="number" name="balance" id="userBalance" step="0.01">
            </div>

            <div>
                <label for="deposits">Deposits:</label>
                <input type="number" name="deposits" id="userDeposits" step="0.01">
            </div>

            <div>
                <label for="withdrawals">Withdrawals:</label>
                <input type="number" name="withdrawals" id="userWithdrawals" step="0.01">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>

        <!-- Delete Button -->
        <button type="button" class="btn btn-danger" id="deleteUserBtn">Delete User</button>
    </div>
</div>



</x-adminlayout>


<style>
    /* Modal Styles */
    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
        border-radius: 8px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Form Styles */
    form div {
        margin-bottom: 15px;
    }

    form label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    form input[type="text"],
    form input[type="email"],
    form input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button.btn-success {
        background-color: var(--primary);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button.btn-danger {
        background-color: var(--danger);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const userRows = document.querySelectorAll('.user-row');
    const modal = document.getElementById('userModal');
    const closeModal = document.querySelector('.close');

    // Close modal functionality
    closeModal.onclick = function() {
        modal.style.display = 'none';
    }

    // Loop through each row and add click event listener
    userRows.forEach(row => {
        row.addEventListener('click', function() {
            const userId = row.getAttribute('data-user-id');
            const userName = row.querySelector('.user-name').textContent;
            const userEmail = row.querySelector('.user-email').textContent;
            const userBalance = row.querySelector('.user-balance').textContent.replace('$', '');
            const userDeposits = row.querySelector('.user-deposits').textContent;
            const userWithdrawals = row.querySelector('.user-withdrawals').textContent;

            // Populate form fields
            document.getElementById('modalUserId').value = userId;
            document.getElementById('userName').value = userName;
            document.getElementById('userEmail').value = userEmail;
            document.getElementById('userBalance').value = userBalance;
            document.getElementById('userDeposits').value = userDeposits;
            document.getElementById('userWithdrawals').value = userWithdrawals;

            // Update the form action URL for updating user
            document.getElementById('userForm').action = `/admin/users/${userId}/update`;

            // Show the modal
            modal.style.display = 'block';

            // Handle delete button
            document.getElementById('deleteUserBtn').onclick = function() {
                if (confirm('Are you sure you want to delete this user?')) {
                    const deleteForm = document.createElement('form');
                    deleteForm.method = 'POST';
                    deleteForm.action = `/admin/users/${userId}/delete`;
                    deleteForm.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                    document.body.appendChild(deleteForm);
                    deleteForm.submit();
                }
            };
        });
    });

    // Close the modal when clicking outside the modal content
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
});
</script>
