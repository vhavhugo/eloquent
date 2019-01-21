CREATE TABLE `artigo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `conteudo` text,
  `criacao` timestamp NULL DEFAULT NULL,
  `atualizacao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `artigo` VALUES (1,'Dicas para quem deseja trabalhar com TI no exterior','No post anterior vimos que existem muitas vagas de TI no exterior. Além da experiência incrível, você pode alavancar sua carreira profissional com esse diferencial no seu currículo. Mas para isso, é necessário muita dedicação e preparo. Sendo assim, preparamos algumas dicas para te guiar ao objetivo de trabalhar fora.','2018-07-20 04:53:15','2018-07-20 04:53:15'),(2,'Mercado de TI no exterior','Trabalhar fora do Brasil pode ser o sonho de muitas pessoas que trabalham com TI. E isso é altamente possível, já que essa é uma área com crescimento contínuo e com milhares de vagas em todo o mundo','2018-07-20 04:53:15','2018-07-20 04:53:15'),(3,'As leis da Gestalt','A Gestalt estuda a nossa percepção em relação ao modo como percebemos algo como um todo antes de notar as partes individuais.\n\nImagine uma árvore. Ao olharmos para ela, enxergamos apenas um único objeto (uma árvore). Só depois que reparamos as partes dela (raizes, galhos, folhas, etc).','2018-07-20 04:53:15','2018-07-20 04:53:15'),(4,'Erros que podem estar te impedindo de conseguir a tão sonhada vaga','mercado de TI cresce a cada dia mais e, com isso, as exigências pelas empresas também. Se você deseja um determinado cargo, você deve trabalhar em estar apto ao que ele pede. Por isso, vamos listar alguns erros que podem estar te tirando do caminho rumo ao seu objetivo.1)','2018-07-20 04:53:15','2018-07-20 04:53:15');

CREATE TABLE `comentario` (
  `codigo` varchar(10) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `conteudo` text,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `comentario` VALUES ('nsd7s8','meu comentario','conteudo meu comentário'),('uda8sd','meu comentario','conteudo meu comentário');
