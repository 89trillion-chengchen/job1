import time
from locust import HttpUser, task, between

class QuickstartUser(HttpUser):
    wait_time = between(1, 2.5)


    @task
    def req_getCombatPoints(self):
        data = {
            "id": "10101",
        }
        login_response = self.client.post('/CombatPoints/getCombatPoints', data=data)

    @task
    def req_getLegalCvcAndUnlockedSoldier(self):
            data = {
                "cvc": "1500",
                "rarity":"1",
                "quality":"1"
            }
            login_response = self.client.post('/LegalCvcAndUnlockedSoldier/getLegalCvcAndUnlockedSoldier', data=data)


    @task
    def req_getUnlockedSoldierJson(self):
            data = {
                "quality":"1"
            }
            login_response = self.client.post('/UnlockedSoldier/getUnlockedSoldierJson', data=data)

    @task
    def req_getRarity(self):
            data = {
                "id": "10101",
            }
            login_response = self.client.post('/Rarity/getRarity', data=data)

    @task
    def req_getLegalSoldier(self):
            data = {
                "cvc": "1500",
            }
            login_response = self.client.post('/LegalSoldier/getLegalSoldier', data=data)

