# PrimoTexto

1) Install using composer:

"require": {
        ...,
        "meniloss/primo-texto": "1.*"
    },
    
2) add to your AppKernel:

$bundles = [
  ...
  new Meniloss\PrimoTextoBundle\MenilossPrimoTextoBundle(),
];

3) config.yml:

You must add your api key find in your account on primotexto.com

meniloss_primo_texto:
    api_key: 123456789acdefghij
    
4) Usage:

