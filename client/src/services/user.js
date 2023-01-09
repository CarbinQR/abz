import requestService from "./request-service.js";

class User
{
    store(data) {
        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        }

        return requestService.post('/users', data, config)
            .then((response) => {
               return response.data;
            });
    }

    fetchList(params = {}) {
        return requestService.get('/users', params).then((response) => {
            return response.data;
        });
    }

    fetch(uid) {
        return requestService.get('/users/' + uid).then((response) => {
            return response.data;
        });
    }

    generateToken() {
        return requestService.get('/token').then((response) => {
            return response.data;
        });
    }
}
export default new User;
