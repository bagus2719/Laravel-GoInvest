<div class="menu">
    <ul>
        <li class="profile">
            <div class="imge">
                <img src="{{ asset('assets/image/profile.png') }}" alt="personal-photo" />
            </div>
            <h2>Admin</h2>
        </li>
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li>
            <a href="{{ route('clients.index') }}" class="{{ request()->routeIs('clients.index') ? 'active' : '' }}">
                <i class="fas fa-user-group"></i>
                <p>Clients</p>
            </a>
        </li>
        <li>
            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
                <i class="fas fa-table"></i>
                <p>Products</p>
            </a>
        </li>
        <li>
            <a href="{{ route('transactions.index') }}"
                class="{{ request()->routeIs('transactions.index') ? 'active' : '' }}">
                <i class="fas fa-money-check"></i>
                <p>Transactions</p>
            </a>
        </li>
        <li class="log-out">
            <i class="fas fa-sign-out"></i>
            <p>Log out</p>
            </a>
        </li>
    </ul>
</div>