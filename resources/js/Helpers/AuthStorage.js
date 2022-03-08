class AuthStorage {
    storeToken(token) {

        localStorage.setItem('token', token);
    }

    storeUser(user) {
        localStorage.setItem('user', user);
    }

    storeUserId(user) {
        localStorage.setItem('user_id', user);
    }

    store(token, user_id, user_name) {
        this.storeToken(token);
        this.storeUser(user_name);
        this.storeUserId(user_id);
    }

    clearAuthCreadentials() {
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        localStorage.removeItem('user_id');
    }

    getToken() {
        localStorage.getItem('token');
    }

    getUser() {
        localStorage.getItem('user');
    }
}

export default AuthStorage = new AuthStorage();