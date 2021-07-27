import time
from locust import HttpUser, task, between

class QuickstartUser(HttpUser):
    wait_time = between(1, 2.5)

    @task
    def hello_world(self):
        self.client.get("/getRarity.php?id=10101")
        self.client.get("/getCombatPoints.php?id=10101")
        self.client.get("/getLegalCvcAndUnlockedSoldier.php?cvc=1500&rarity=1&quality=1")
        self.client.get("/getLegalSoldier.php?cvc=1500")
        self.client.get("/getUnlockedSoldierJson.php?quality=1")


