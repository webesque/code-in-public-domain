data "amazon-ami" "almalinux" {
  filters = {
    virtualization-type = "hvm"
    name                = "AlmaLinux OS 8.4.*"
  }
  # Found by looking up the owner of published AMI https://archive.ph/W87NI#community-amis
  owners      = ["764336703387"]
  most_recent = true
}

source "amazon-ebs" "almalinux" {
  ami_name              = "AlmaLinux OS 8.4-PHP8.0"
  source_ami            = data.amazon-ami.almalinux.id
  ssh_username          = "ec2-user"
  instance_type         = "t3.micro"
  force_delete_snapshot = true

  ami_groups = ["all"]
}

build {
  sources = [
    "amazon-ebs.almalinux"
  ]

  provisioner "ansible" {
    playbook_file = "./playbook.yml"
    extra_arguments = [
      "--extra-vars", "cloud_provisioning=1"
    ]
  }
}

