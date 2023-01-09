import axios from 'axios';

const API_URL = 'http://127.0.0.1:8080/api';

const requestService = {
    get(url, params = {}, headers = {}) {
        return axios.get(API_URL + url, {
            params,
            headers
        });
    },
    post(url, body = {}, config = {}) {
        return axios.post(API_URL + url, body, config);
    },
    put(url, body = {}, config = {}) {
        return axios.put(API_URL + url, body, config);
    },
    patch(url, body = {}, config = {}) {
        return axios.patch(API_URL + url, body, config);
    },
    delete(url, config = {}) {
        return axios.delete(API_URL + url, config);
    }
};

export default requestService;