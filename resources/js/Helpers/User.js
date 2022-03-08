import Token from './Token'
import AuthStorage from './AuthStorage'

class User {
    responseAfterLogin (response) {
        console.log(response)
        const access_token = response.data.access_token
        const user_id = response.data.user.id;
        const user_name = response.data.user.name;
        if(Token.isValidToken(access_token)) {
            AuthStorage.store(access_token, user_id, user_name);
        }
    }

    hasTokenInStorage() {
        const getTokenFromStorage = localStorage.getItem('token');
        if (getTokenFromStorage) {
            return Token.isValidToken(getTokenFromStorage) ? true : false;
        }

        return false;
    }

    isLoggedIn() {
        return this.hasTokenInStorage();
    }

    logout() {
        AuthStorage.clear();
        window.location = '/'
    }

    user() {
        if(this.isLoggedIn) {
            return localStorage.getItem('user');
        }
    }

    userId() {
        if(this.isLoggedIn) {
            return localStorage.getItem('user_id');
        }
        return false;
    }
}

export default User = new User();