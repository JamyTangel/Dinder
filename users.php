<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welkom</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="header">
            <div class="logo">
            <img src="images/logo_transparent.png" alt="logo" width="100" height="100">
            </div>
            <?php
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <ul>
                    <li><a href="users.php">Home</a></li>
                    <li><a href="profiel.php">Mijn profiel</a></li>
                    <li><a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a></li>
                </ul>
            <div class="message">
                <a href="users2.php">
                    <img src="images/message.jpg" alt="logo" width="100" height="100">
                </a>
            </div>
    </div>
    <br><br><br><br>
        <div class="banner">
            <img src="images/banner.jpg" alt="banner" width="1500" height="400">
            <div class="tekst">Welkom<br><?php echo $row['fname']?></div>
        </div>
    <br><br><br><br>
    <div id="board"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    <script>

        class Carousel {

            constructor(element) {

                this.board = element

                // add first two cards programmatically
                this.push()
                this.push()

                // handle gestures
                this.handle()

            }

            handle() {

                // list all cards
                this.cards = this.board.querySelectorAll('.card')

                // get top card
                this.topCard = this.cards[this.cards.length - 1]

                // get next card
                this.nextCard = this.cards[this.cards.length - 2]

                // if at least one card is present
                if (this.cards.length > 0) {

                    // set default top card position and scale
                    this.topCard.style.transform =
                        'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'

                    // destroy previous Hammer instance, if present
                    if (this.hammer) this.hammer.destroy()

                    // listen for tap and pan gestures on top card
                    this.hammer = new Hammer(this.topCard)
                    this.hammer.add(new Hammer.Tap())
                    this.hammer.add(new Hammer.Pan({
                        position: Hammer.position_ALL,
                        threshold: 0
                    }))

                    // pass events data to custom callbacks
                    this.hammer.on('tap', (e) => {
                        this.onTap(e)
                    })
                    this.hammer.on('pan', (e) => {
                        this.onPan(e)
                    })

                }

            }

            onTap(e) {

                // get finger position on top card
                let propX = (e.center.x - e.target.getBoundingClientRect().left) / e.target.clientWidth

                // get rotation degrees around Y axis (+/- 15) based on finger position
                let rotateY = 15 * (propX < 0.05 ? -1 : 1)

                // enable transform transition
                this.topCard.style.transition = 'transform 100ms ease-out'

                // apply rotation around Y axis
                this.topCard.style.transform =
                    'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(' + rotateY + 'deg) scale(1)'

                // wait for transition end
                setTimeout(() => {
                    // reset transform properties
                    this.topCard.style.transform =
                        'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'
                }, 100)

            }

            onPan(e) {

                if (!this.isPanning) {

                    this.isPanning = true

                    // remove transition properties
                    this.topCard.style.transition = null
                    if (this.nextCard) this.nextCard.style.transition = null

                    // get top card coordinates in pixels
                    let style = window.getComputedStyle(this.topCard)
                    let mx = style.transform.match(/^matrix\((.+)\)$/)
                    this.startPosX = mx ? parseFloat(mx[1].split(', ')[4]) : 0
                    this.startPosY = mx ? parseFloat(mx[1].split(', ')[5]) : 0

                    // get top card bounds
                    let bounds = this.topCard.getBoundingClientRect()

                    // get finger position on top card, top (1) or bottom (-1)
                    this.isDraggingFrom =
                        (e.center.y - bounds.top) > this.topCard.clientHeight / 2 ? -1 : 1

                }

                // get new coordinates
                let posX = e.deltaX + this.startPosX
                let posY = e.deltaY + this.startPosY

                // get ratio between swiped pixels and the axes
                let propX = e.deltaX / this.board.clientWidth
                let propY = e.deltaY / this.board.clientHeight

                // get swipe direction, left (-1) or right (1)
                let dirX = e.deltaX < 0 ? -1 : 1

                // get degrees of rotation, between 0 and +/- 45
                let deg = this.isDraggingFrom * dirX * Math.abs(propX) * 45

                // get scale ratio, between .95 and 1
                let scale = (95 + (5 * Math.abs(propX))) / 100

                // move and rotate top card
                this.topCard.style.transform =
                    'translateX(' + posX + 'px) translateY(' + posY + 'px) rotate(' + deg + 'deg) rotateY(0deg) scale(1)'

                // scale up next card
                if (this.nextCard) this.nextCard.style.transform =
                    'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(' + scale + ')'

                if (e.isFinal) {

                    this.isPanning = false

                    let successful = false

                    // set back transition properties
                    this.topCard.style.transition = 'transform 200ms ease-out'
                    if (this.nextCard) this.nextCard.style.transition = 'transform 100ms linear'

                    // check threshold and movement direction
                    if (propX > 0.25 && e.direction == Hammer.DIRECTION_RIGHT) {

                        successful = true
                        // get right border position
                        posX = this.board.clientWidth

                    } else if (propX < -0.25 && e.direction == Hammer.DIRECTION_LEFT) {

                        successful = true
                        // get left border position
                        posX = -(this.board.clientWidth + this.topCard.clientWidth)

                    } else if (propY < -0.25 && e.direction == Hammer.DIRECTION_UP) {

                        successful = true
                        // get top border position
                        posY = -(this.board.clientHeight + this.topCard.clientHeight)

                    }

                    if (successful) {

                        // throw card in the chosen direction
                        this.topCard.style.transform =
                            'translateX(' + posX + 'px) translateY(' + posY + 'px) rotate(' + deg + 'deg)'

                        // wait transition end
                        setTimeout(() => {
                            // remove swiped card
                            this.board.removeChild(this.topCard)
                            // add new card
                            this.push()
                            // handle gestures on new top card
                            this.handle()
                        }, 200)

                    } else {

                        // reset cards position and size
                        this.topCard.style.transform =
                            'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(1)'
                        if (this.nextCard) this.nextCard.style.transform =
                            'translateX(-50%) translateY(-50%) rotate(0deg) rotateY(0deg) scale(0.95)'

                    }

                }

            }

            push() {

                let card = document.createElement('div')

                card.classList.add('card')

                card.style.backgroundImage =
                    "url('https://picsum.photos/320/320/?random=" + Math.round(Math.random() * 1000000) + "')"

                this.board.insertBefore(card, this.board.firstChild)

            }

        }
      let board = document.querySelector('#board')

        let carousel = new Carousel(board)
    </script>

</body>
</html>