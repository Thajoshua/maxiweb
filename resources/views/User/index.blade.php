<x-userlayout>
    <div class="profile_div">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="info-box">
              <i class="fas fa-user"></i>
              <div class="info-details">
                <h4>Your Username</h4>
                <p>dynamic</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="info-box">
              <i class="fas fa-calendar-alt"></i>
              <div class="info-details">
                <h4>Registration Date</h4>
                <p>21-September-2024</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="info-box">
              <i class="fas fa-clock"></i>
              <div class="info-details">
                <h4>Last Update</h4>
                <p>23-September-2024 06:19 PM</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="info-box">
              <i class="fas fa-dollar-sign"></i>
              <div class="info-details">
                <h4>Active Deposits</h4>
                <b>${{ number_format($account->balance, 2) }}</b>
                <a href="#" class="sp btn btn-primary" id="showDepositModal">Make A Deposit</a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="info-box">
              <i class="fas fa-wallet"></i>
              <div class="info-details">
                <h4>Your Balance</h4>
                <p>$0</p>
                <button class="sp2 btn btn-primary unique-withdraw-btn" data-bs-toggle="modal" data-bs-target="#withdrawModal"> Withdraw Funds</button>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="info-box">
              <i class="fas fa-chart-line"></i>
              <div class="info-details">
                <h4>Profit</h4>
                <p>${{ number_format($account->total_profit, 2) }}</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 info_f col-lg-6">
            <div class="info-box">
              <h4><i class="fas fa-chart-line"></i> ${{ number_format($account->deposits, 2) }}</h4>
              <p>Last Deposit</p>
            </div>
          </div>

          <div class="col-md-6 info_f col-lg-6">
            <div class="info-box">
              <h4><i class="fas fa-chart-line"></i> ${{ number_format($account->withdrawals, 2) }}</h4>
              <p>Last Withdrawal</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Withdraw Modal -->
    <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="withdrawModalLabel">Withdraw Funds</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="withdrawForm"  action="{{ route('withdraw') }}" method="POST">
              <div class="mb-3">
                <label for="withdrawAmount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="withdrawAmount" placeholder="Enter amount to withdraw" required>
              </div>
              <div class="mb-3">
                <label for="pin" class="form-label">Enter PIN</label>
                <input type="password" class="form-control" id="pin" placeholder="Enter your 4-digit PIN" required>
              </div>
              {{-- <form > --}}
              <button type="submit" class="btn btn-primary">Submit Withdrawal</button>

                @csrf
                {{-- <input type="text" name="pin" placeholder="Enter your pin" required>
                <button type="submit">Withdraw</button> --}}
            {{-- </form> --}}
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Deposit Modal -->
    <div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="depositModalLabel">Deposit Methods</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <label for="paymentMethod">Select Payment Method:</label>
              <select id="paymentMethod" class="form-select">
                <option value="paypal">PayPal</option>
                <option value="zelle">Zelle</option>
                <option value="bank_transfer">Bank Transfer</option>
              </select>
            </div>

            <!-- Details for each payment method -->
            <div id="paymentDetails" class="mt-4"></div>
          </div>
        </div>
      </div>
    </div>

  </x-userlayout>

  <script>
    // Show deposit modal when 'Make A Deposit' is clicked
    document.getElementById('showDepositModal').addEventListener('click', function () {
      const depositModal = new bootstrap.Modal(document.getElementById('depositModal'));
      depositModal.show();
    });

    // Handle payment method selection
    document.getElementById('paymentMethod').addEventListener('change', function () {
      const selectedMethod = this.value;
      const paymentDetails = document.getElementById('paymentDetails');

      if (selectedMethod === 'paypal') {
        paymentDetails.innerHTML = `
          <h5>PayPal Account Details:</h5>
          <p>Email: <strong>paypal@example.com</strong></p>
          <p>Account Holder: <strong>John Doe</strong></p>
        `;
      } else if (selectedMethod === 'zelle') {
        paymentDetails.innerHTML = `
          <h5>Zelle Account Details:</h5>
          <p>Email: <strong>zelle@example.com</strong></p>
          <p>Phone: <strong>+1234567890</strong></p>
        `;
      } else if (selectedMethod === 'bank_transfer') {
        paymentDetails.innerHTML = `
          <h5>Bank Transfer Details:</h5>
          <p>Bank Name: <strong>Example Bank</strong></p>
          <p>Account Number: <strong>123456789</strong></p>
          <p>Routing Number: <strong>987654321</strong></p>
        `;
      } else {
        paymentDetails.innerHTML = '';
      }
    });

    // Automatically trigger the first option (PayPal) on load
    document.getElementById('paymentMethod').dispatchEvent(new Event('change'));
  </script>
