import requestService from "./request-service.js";

class Position
{
    fetchList() {
        return requestService.get('/positions').then((response) => {
            return response.data;
        });
    }
}
export default new Position;
