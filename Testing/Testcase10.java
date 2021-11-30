package Final;

import org.junit.Assert;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class Testcase10 {

    @Test
    public void unenroll_course() throws InterruptedException {
        System.setProperty("webdriver.chrome.driver", "C:\\data\\chromedriver.exe");
        WebDriver driver = new ChromeDriver();
        driver.get("http://localhost/online_education/");
        driver.manage().window().maximize();
        Thread.sleep(2000);
        driver.findElement(By.linkText("Login")).click();
        Thread.sleep(2000);
        driver.findElement(By.name("email")).sendKeys("HNJJ@gmail.com");
        Thread.sleep(2000);
        driver.findElement(By.name("pwd")).sendKeys("HNJJ");
        Thread.sleep(2000);
        driver.findElement(By.name("submit")).click();
        Thread.sleep(2000);
        driver.switchTo().alert().accept();
        Thread.sleep(2000);
        driver.findElement(By.linkText("View Enrolled Courses")).click();
        Thread.sleep(2000);
        driver.findElement(By.linkText("Unenroll Course")).click();
        Thread.sleep(2000);
        String message=driver.switchTo().alert().getText();
        Thread.sleep(2000);
        Assert.assertEquals(message,"Course Un-Enrolled");
        driver.quit();
    }



}

