package Final;

import org.junit.internal.TextListener;
import org.junit.runner.JUnitCore;

public class Maintestclass {
    public static void main(String args[]){
        JUnitCore junit = new JUnitCore();
        junit.addListener(new TextListener(System.out));
        junit.run(Testcase1.class,Testcase2.class,Testcase3.class,Testcase4.class,Testcase5.class,Testcase6.class,Testcase7.class,
                Testcase8.class,Testcase9.class,Testcase10.class);
    }

}