package firstjavafxsphere;

import javafx.stage.Stage;
import javafx.scene.Scene;
import javafx.scene.shape.Circle;
import javafx.scene.text.Text;
import javafx.scene.text.Font;
import javafx.scene.text.TextAlignment;
import javafx.scene.paint.Color;
import javafx.scene.paint.RadialGradient;
import javafx.scene.paint.Stop;

Stage {
    title: "My First JavaFX Sphere"
    width: 250
    height: 250
    scene: Scene {
        content: [
            Circle {
                centerX: 100,
                centerY: 100
                radius: 90
                fill: RadialGradient {
                    centerX: 75
                    centerY: 75
                    radius: 90
                    proportional: false
                    stops: [
                        Stop {
                            offset: 0.0
                            color: Color.RED},
                        Stop {
                            offset: 1.0
                            color: Color.DARKRED}
                    ]
                }
            }
            Text {
                font: Font { size: 24 }
                x: 20, y: 90
                textAlignment: TextAlignment.CENTER
                content: "Welcome to\nJavaFX World"
            }
        ]
    }
}
