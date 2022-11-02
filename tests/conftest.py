from selenium import webdriver
from selenium.webdriver.chrome.service import Service as ChromeService
from webdriver_manager.chrome import ChromeDriverManager
from webdriver_manager.core.utils import ChromeType
from pytest import fixture
from selenium.webdriver.common.by import By

options = webdriver.ChromeOptions()
options.binary_location = "C:/Program Files/BraveSoftware/Brave-Browser/Application/brave.exe"
service = ChromeService(ChromeDriverManager(chrome_type=ChromeType.BRAVE).install())
browser_driver = webdriver.Chrome(service=service, options=options)

@fixture(scope='module')
def driver():
  yield browser_driver
  browser_driver.close()

@fixture(scope='function')
def open_add_contact():
  browser_driver.get("http://localhost/pages/")
  browser_driver.find_element(By.LINK_TEXT, "Cadastrar Contato").click()

@fixture(scope='function')
def contact_data():
    return {
    "name": "name",
    "phone": "12123132132",
    "email": "email@email.com"
  }
